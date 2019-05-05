# Trainable-ESP8266

ESP8266 based LED strip display of Yes/No API data.

Example API queries:
Will it rain today? Have I reached my Kickstarter goals? Snow day? Good windspeed to fly drone? 


Change settings easily & remotely - by using web app.


Beat memory limits - by storing settings externally, served in sections.


Manage multiple devices

Optimized circuit efficiency by using < 80 pure red, green, or blue WS2812B LEDs.

# Circuit:

D1 Mini ESP8266 5V---USB 5V 2A---LED VCC

D1 Mini ESP8266 GND---USB Ground 2A---LED Ground

D1 Mini ESP8266 GPIO4(D2)---LED Strip Data In
