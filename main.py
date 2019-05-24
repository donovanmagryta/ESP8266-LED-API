
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
np[0]= (0, 128, 0)
np.write()
print ('booting up')
#response = urequests.get('http://torchive.000webhostapp.com/program.json').json()
while True:
  response = urequests.get('http://ledapiesp.000webhostapp.com/program.json').json()
  time.sleep(5)
  print('database delay done')
  i = 1
  while (i < 59):
    z = str(i)
    try:
      url = response[device][z]["url"]
      print (url)
      find1 = response[device][z]["find1"]
      if find1.isdigit():
        find1 = int(find1)
      else:
        find1 = str(find1)
      print (find1)
      find2 = response[device][z]["find2"]
      if find2.isdigit():
        find2 = int(find2)
      else:
        find2 = str(find2)
      print (find2)
      find3 = response[device][z]["find3"]
      if find3.isdigit():
        find3 = int(find3)
      else:
        find3 = str(find3)
      print (find3)
      find4 = response[device][z]["find4"]
      if find4.isdigit():
        find4 = int(find4)
      else:
        find4 = str(find4)
      print (find4)
      match = response[device][z]["matches"]
      #print (match)
      pause = response[device][z]["pause"]
      print("pausing for:")
      print (pause)
      pauseit = float(pause)
      time.sleep(pauseit)
      finder1 = "indice 1"
      findi1 = finder1
      finder2 = "indice 2"
      findi2 = finder2
      finder3 = "indice 3"
      findi3 = finder3
      finder4 = "indice 4"
      findi4 = finder4
      print('did not try to convert strings')
      responsey = urequests.get(url).json()
      print('got master json')
      if(find2 == findi2 and find3 == findi3 and find4 == findi4):
          print('case1')
          findi = responsey[find1]
          findy = str(findi)
          findy = findi
      if (find2 != findi2 and find3 == findi3 and find4 == findi4):
          print('case2')
          findi = responsey[find1][find2]
          findy = str(findi)
      if (find2 != findi2 and find3 != findi3 and find4 == findi4):
          print('case3')
          findi = responsey[find1][find2][find3]
          findy = str(findi)
      if (find2 != findi2 and find3 != findi3 and find4 != findi4):
          print('case4')
          findi = responsey[find1][find2][find3][find4]
          findy = str(findi)
      print(findy)
      match2 = str(match)
      print(match2)
      if (findy == match2):
        np[i] = (0, 128, 0)
        np.write()
        time.sleep(2)
        print("found")
        print(match)
        print("at")
        print(url)
      elif (findy != match2):
        print("didn't find")
        print(match)
        print ("at")
        print(url)
        np[i]= (255, 0, 0)
        np.write()
        time.sleep(2)
        pass
    except:
      np[0]= (255, 0, 0)
      np.write()
      time.sleep(2)
      print("none")
      pass
    i = i + 1
    print(i)




