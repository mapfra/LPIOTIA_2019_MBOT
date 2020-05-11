#include "LDHT.h"

#define DHTPIN 2          
#define DHTTYPE DHT11     

LDHT dht(DHTPIN,DHTTYPE);

float tempC=0.0,Humi=0.0;

void setup()
{
    Serial.begin(9600);
    dht.begin();
  
    Serial.print(DHTTYPE);
    Serial.println(" Volthaus Lab Environment ");
}

void loop()
{
    if(dht.read())
    {
        tempC = dht.readTemperature();

        Serial.println("*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*");
        Serial.print("Temperature Celsius = ");
        Serial.print(dht.readTemperature());
        Serial.println("C");
    }

    delay(2000);
}
