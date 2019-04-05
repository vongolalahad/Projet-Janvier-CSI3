# coding: utf-8

import socket
import time
import os

IDtransac = "0x04"
IDEntrepot = "0001"

s=socket.socket(socket.AF_INET, socket.SOCK_STREAM)
s.connect(("192.168.43.164", 1111))

s.send(IDtransac.encode())
time.sleep(1)
s.send(IDEntrepot.encode())
time.sleep(1)
response = s.recv(9999999)
file = open("D:\Entrepot1\Confirmation\Confirmation_Commande.txt","w")
file.write(response.decode())
file.close
os.system("start D:\Entrepot1\Stock.exe")
s.close()