void  setup ()  { 
// Définir la broche 13 comme broche de sortie 
pinMode(13, OUTPUT ); 
}

void  loop ()  { 
// Allume la LED sur 
digitalWrite ( 13 , HIGH ); 
// Attendre 1 seconde de
delay ( 1000 ); 
// Éteignez la LED 
digitalWrite ( 13 , LOW ); 
// Attendre 1 seconde de
delay ( 1000 ); 
}
