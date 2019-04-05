# coding: utf-8

import socket
import time
import os

IDtransac = "0x03"
IDEntrepot = "0002"

s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
s.connect(("192.168.43.164", 1111))

s.send(IDtransac.encode())
time.sleep(1)
s.send(IDEntrepot.encode())
time.sleep(1)
file = open("D:\Entrepot2\Send\Reponse_Entrepot.txt","rb")
s.send(file.read())
file.close
os.system("python D:\Entrepot2\EntrepotRecep.py")
s.close()