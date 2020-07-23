# Meteostanica-Arduino-ESP
**Podpora pre viac projektov zdarma: https://paypal.me/chlebovec**

**Meteostanica ponúka:**
* Záznam 3x teploty, 1x atmosférický tlak (možnosť prepočítavať na hladinu mora, možnosť určovať aj nadmorskú výšku), 1x vlhkosť vzduchu
* Grafické používateľské rozhranie (responzívne)
* Výpis real-time dát do tabuľky s overením konektivity
* Tabuľkový výpis posledných 1000 meraní
* Login systém
* Archivácia v 5-15-minútových intervaloch do MySQL databázy, Google Grafy (náhrada za CanvasJS) - výpis grafov aktuálny deň + 7 posledných dní
* Orientačná prognóza počasia z nameraných údajov
* Reset dosky na diaľku
* Log prihlásení/zmena loginu
* Indikátor stavu pripojenia dosky
* Zmena názvov jednotlivých izieb/názvov senzorov
# Hardvér
**Komunikačný hardvér pre meteostanicu (IBA HTTP - 80):**
* Arduino Uno + Ethernet shield Wiznet W5100 - HTTP
* Arduino Uno + Ethernet modul Wiznet W5200 až W5500 - HTTP
* ESP8266 (NodeMCU, Wemos D1 Mini) - HTTP, možné aj HTTPS
* ESP32 (DevKit) - HTTP, možné aj HTTPS

**Kombinácie senzorov (zdrojové kódy vyhotovené pre):**
* **Variant 1** -  DS18B20 + DHT22 + BMP280
* **Variant 2** - DS18B20 + DS18B20 (outdoor) + BME280

# Softvér
**Softvérové technológie pre meteostanicu:**
* PHP 5.6 / 7+
* HTML 5
* CSS
* AJAX - dynamický výpis real-time dát z databázy spúšťaním .php scriptov
* Google Charts - čiarové grafy pre časovú reprezentáciu vývoja dát, budíkové reprezentácia maxím, miním
* Wiring - zjednodušený C jazyk pre Arduino IDE

# Prekvizita
**Pre spustenie projektu je nutné:**
* Mať webserver v LAN sieti, alebo na internete, kam sa bude Arduino pripájať
* Webserver musí byť na HTTP protokole (Arduino nepodporuje HTTPS)
* Webserver musí mať MySQL databázu (napr. PHPMyAdmin)
* Webserver musí mať prístup na internet (knižnice na CDN serveroch: Jquery, Bootstrap)

# Inštalácia a spustenie projektu
* Obsah zložky examples/src/ nakopírovať do: C:/Users/(ACTUAL_USER)/Documents/Arduino/libraries
* V súboroch /system/connect.php a /system/nodemcu/api.php je potrebné zmeniť údaje k MySQL databáze
* Default login do webaplikácie je: **admin** heslo: **admin** (meno a heslo uložené v SHA1 formáte)
* Do použitého zdrojového kódu pre mikrokontróler je potrebné upraviť adresu webu a cestu k add.php súboru, kam bude vykonávať GET requesty

**Screenshoty webaplikácie meteostanice:**
![Prehľad nameraných údajov](https://i.nahraj.to/f/2fIb.PNG)
![Grafická reprezentácia nameraných údajov v čase](https://i.nahraj.to/f/2fIe.PNG)
![Budíková reprezentácia maxím, miním, priemerov](https://i.nahraj.to/f/2fIf.PNG)

# Schéma zapojenia - Autodesk Eagle Export
**Arduino + BMP280 + DHT22 + DS18B20:**
![Arduino + BMP280 + DHT22 + DS18B20](https://i.imgur.com/sMJskFE.png)

**Arduino + BME280 + DS18B20:**
![Arduino + BME280 + DS18B20](https://i.imgur.com/z2254a7.png)

**NodeMCU + BMP280 + DHT22 + DS18B20:**
![NodeMCU + BMP280 + DHT22 + DS18B20](https://i.imgur.com/AyyBSra.png)

**NodeMCU + BME280 + DS18B20:**
![NodeMCU + BME280 + DS18B20](https://i.imgur.com/gL3FFpP.png)

**ESP32 + BMP280 + DHT22 + DS18B20:**
![ESP32 + BMP280 + DHT22 + DS18B20](https://i.imgur.com/OCqmDPv.png)

**ESP32 + BME280 + DS18B20:**
![ESP32 + BME280 + DS18B20](https://i.imgur.com/ehTWE0m.png)
