# coding: utf-8

import socket
import os

IDtransac = "0x02"

s=socket.socket(socket.AF_INET, socket.SOCK_STREAM)
s.connect(("192.168.43.164", 1111))

s.send(IDtransac.encode())
response = s.recv(9999999)
file = open("D:\Entrepot1\Recep\Commande_Client.txt","w")
file.write(response.decode())
file.close
os.system("start D:\Entrepot1\Gestion.exe")
s.close()