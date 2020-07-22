# Meteostanica-Arduino-ESP

**Softvérové technológie pre meteostanicu:**
* PHP 5.6 / 7+
* HTML 5
* CSS
* AJAX - dynamický výpis real-time dát z databázy spúšťaním .php scriptov
* Google Charts - čiarové grafy pre časovú reprezentáciu vývoja dát, budíkové reprezentácia maxím, miním
* Wiring - zjednodušený C jazyk pre Arduino IDE

**Pre spustenie projektu je nutné:**
* Mať webserver v LAN sieti, alebo na internete, kam sa bude Arduino pripájať
* Webserver musí byť aj na HTTP protokole (Arduino nepodporuje HTTPS)
* Webserver musí mať MySQL databázu (napr. PHPMyAdmin)
* Webserver musí mať prístup na internet (knižnice na CDN serveroch: Jquery, Bootstrap)

**Komunikačný hardvér pre meteostanicu:**
* Arduino Uno + Ethernet shield Wiznet W5100 - HTTP
* Arduino Uno + Ethernet modul Wiznet W5200 až W5500 - HTTP
* ESP8266 (NodeMCU, Wemos D1 Mini) - HTTP / HTTPS
* ESP32 (DevKit) - HTTP / HTTPS
