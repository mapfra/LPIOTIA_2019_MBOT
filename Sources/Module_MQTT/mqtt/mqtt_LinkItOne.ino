#include <LWiFi.h>
#include <LWiFiClient.h>
#include <LGSM.h>
#include <Arduino.h>
#include <PubSubClient.h>

// WiFi stuff
#define WIFI_AP "freebox_Benoit06"
#define WIFI_PASSWORD "******"
#define WIFI_AUTH LWIFI_WPA // one of LWIFI_OPEN / LWIFI_WPA / LWIFI_WEP
#define mqttUser "MBOT"
#define mqttPass "toto"
#define mqttPort 1883
LWiFiClient wifiClient;
IPAddress myIP;
uint8_t macAddressBin[VM_WLAN_WNDRV_MAC_ADDRESS_LEN] = {0};
char macAddressStr [20];
 
// MQTT broker
char mqttBroker[] = {192.168.0,50}; 


char mqttClientPrefix[] = "LinkitOne01";
char mqttClientId[40];
PubSubClient client( wifiClient );

// Topics
char inTopic[] = "sensor/temperature/#";

//SMS
char message[256];


unsigned long lastSend;

//------------------------------------------------------------------------------------------------

void InitLWiFi()
{
 LWiFi.begin();
 // Keep retrying until connected to AP
 Serial.println("Connecting to AP: " + String(WIFI_AP));
 while (0 == LWiFi.connect(WIFI_AP, LWiFiLoginInfo(WIFI_AUTH, WIFI_PASSWORD))) {
 delay(1000);
 }
 myIP = LWiFi.localIP();
 Serial.println("Connected");
 Serial.print("IP Address: ");
 Serial.println(myIP);
 LWiFi.macAddress(macAddressBin);
 Serial.print("MAC Address: ");
 sprintf(macAddressStr, "%02x%02x%02x%02x%02x%02x", macAddressBin[0], macAddressBin[1], macAddressBin[2], macAddressBin[3], macAddressBin[4], macAddressBin[5]);
 Serial.println(macAddressStr);
 sprintf(mqttClientId, "%s.%s", mqttClientPrefix, macAddressStr); // construct unique mqtt client id from prefix and MAC

}

void reconnect() {
 // Loop until we're reconnected
 while (!client.connected()) {
 if(LWiFi.status()==LWIFI_STATUS_DISCONNECTED){
 Serial.println("Connecting to wifi again");
 InitLWiFi();
 }
 
 Serial.println("Connecting to MQTT broker: " + String(mqttBroker));
 // Attempt to connect
 if ( client.connect(mqttClientId,mqttUser,mqttPass) ) { // Better use some random name
 Serial.println( "Connected as client: " + String(mqttClientId));
 Serial.println("Subscribing to topic: " + String(inTopic));
 client.publish( mqttClientId, "ready" );
 client.subscribe( inTopic );
 } else {
 Serial.print( "[FAILED] [ rc = " );
 Serial.print( client.state() );
 Serial.println( " : retrying in 5 seconds]" );
 // Wait 5 seconds before retrying
 delay( 5000 );
 }
 }
}

void callback( char* topic, byte* payload, unsigned int length ) {
 Serial.print( "Received message on Topic: " );
 Serial.println( topic );

 Serial.print("Msg:");
 Serial.println((char *)payload);
}

//------------------------------------------------------------------------------------------------

void setup()
{
 delay( 10000 );
 Serial.begin( 115200 );
 Serial.println("Setting up WIFI");
 InitLWiFi();
 Serial.println("WIFI setup done, setting up mqtt clinet");
 client.setServer( mqttBroker, mqttPort );
 client.setCallback( callback );

 lastSend = 0;
 Serial.println("Setup done");
}

void loop()
{
 if( !client.connected() ) {
 reconnect();
 }
 client.loop();
}
