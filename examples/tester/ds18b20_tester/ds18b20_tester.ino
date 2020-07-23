// NORMALNE ZAPOJENIE (PINY DS18B20 SA MOZU LISIT PODLA VYHOTOVENIA): https://www.tweaking4all.com/wp-content/uploads/2014/03/ds18b20-normal-power.jpg
// PARAZITNE ZAPOJENIE (PINY DS18B20 SA MOZU LISIT PODLA VYHOTOVENIA): https://www.tweaking4all.com/wp-content/uploads/2014/03/ds18b20-parasite-power.jpg
#include <OneWire.h>
#include <DallasTemperature.h>
#define ONE_WIRE_BUS 5 //pin na ktory je OneWire zbernica napojena
OneWire oneWire(ONE_WIRE_BUS);
DallasTemperature sensors(&oneWire); 

void setup() {      
  sensors.begin();                                 
  delay(2000);                
  Serial.begin(115200);
}

void loop() { 
  sensors.requestTemperatures();
  delay(1000);  //delay minimalne 500-750ms
  Serial.println("Teplota prve cidlo:"); 
  Serial.println(sensors.getTempCByIndex(0));
  Serial.println("Teplota druhe cidlo:"); 
  Serial.println(sensors.getTempCByIndex(1)); 
  delay(2000); 
}
