#include <Wire.h>
#include "SparkFun_Si7021_Breakout_Library.h" //Kniznica pre SHT21 senzor

Weather sensor; //instancia pre senzor

void setup() { //cast setupu prebieha iba raz
  Serial.begin(115200); //pocet znakov/s v serial monitore - UART
  delay(10); //vyckaj na inicializaciu
  sensor.begin();
 delay(1000);
}


void loop() {
  delay(1000);
  Serial.println("Vlhkost: ");
  float vlhkost = sensor.getRH();
  Serial.println(vlhkost);
  float teplotadnu = sensor.getTemp();
  Serial.println("Teplota: ");
  Serial.println(teplotadnu);
  delay(1000);
}
        
