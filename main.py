

import urequests
import network
import time
import machine
import neopixel

import ConnectWiFi
ConnectWiFi.connect()
device = str(1)
np = neopixel.NeoPixel(machine.Pin(4),60)
#loopmax = 60
#use only pure red green or blue and Max 80 pixels (20ma per LED color) to prevent over current.
np[59] = (255,0,0)
np.write()
#response = urequests.get('http://torchive.000webhostapp.com/program.json').json()
while True:
  response = urequests.get('http://torchive.000webhostapp.com/program.json').json()
  time.sleep(60)
  print("database delay done")
  i = 0
  while (i < 58):
    #i = 1
    z = str(i)
    # parsed = response.json()
    #print(response.text)
    #print(type(response.text))
    #url = (parsed[0][1])
    try:
      url = response[device][z]["url"]
      #print (url)
      #uri = str(url)
      find = response[device][z]["find"]
      #print (find)
      match = response[device][z]["matches"]
      #print (match)
      pause = response[device][z]["pause"]
      print ("pausing for:")
      print (pause)
      pauseit = float(pause)
      np[59] = (0, 128, 0)
      time.sleep(pauseit)
      responsey = urequests.get(url).json()
      find2 = responsey[find]
      find3 = str(find2)
      if (find3 == match):
        print ("found")
        np[i] = (0, 128, 0)
        np.write()
        print ("yes match at")
        print (i)
      elif (match != find3):
        np[i]= (255, 0, 0)
        np.write()
        print ("no match at")
        print (i)
    except:
      #break
      print ('error in api fetch')
      np[59] = (0,0,255)
      np.write()
      #t = i + 1
      pass
    #if (t < i):
    i = i + 1


