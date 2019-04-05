# coding: utf-8

import socket
import threading
import time
from watchdog.events import FileSystemEventHandler
from watchdog.observers import Observer
import os

class ClientThread(threading.Thread):

    def __init__(self, ip, port, clientsocket):

        threading.Thread.__init__(self)
        self.ip = ip
        self.port = port
        self.clientsocket = clientsocket
        print("[+] Nouveau thread pour %s %s" % (self.ip, self.port, ))

    def run(self):
        global EnvoiRDY
        global EnvoiEntrepo1RDY
        global EnvoiEntrepo2RDY
        global TraitementRDY
        print("Connection de %s %s" % (self.ip, self.port, ))
        IDtransac = self.clientsocket.recv(255)

        if (IDtransac.decode()) == "0x00":
            print("IDTransaction = %s" % (IDtransac.decode()))
            EnvoiRDY = 1
            os.system("start D:\\Serveur\\Dispatchaller.exe")

        elif (IDtransac.decode()) == "0x01":
            print("IDTransaction = %s" % (IDtransac.decode()))
            response = self.clientsocket.recv(9999999)
            file = open("D:\Serveur\RecepClient\Commande_Site.txt","w")
            file.write(response.decode())
            file.close
            time.sleep(1)
            os.system("start D:\\Serveur\\RecepCommande.exe")

        elif (IDtransac.decode()) == "0x02":
            print("IDTransaction = %s" % (IDtransac.decode()))
            while EnvoiRDY != 1:
                time.sleep(1)
            time.sleep(5)
            EnvoiRDY=0
            time.sleep(5)
            file = open("D:\Serveur\SendEntrepot\Commande_Client.txt","rb")
            self.clientsocket.send(file.read())
            file.close


        elif (IDtransac.decode()) == "0x03":
            print("IDTransaction = %s" % (IDtransac.decode()))
            IDEntrepot = self.clientsocket.recv(255)
            print("IDEntrepot = %s" % (IDEntrepot.decode()))
            if (IDEntrepot.decode()) == "0001":
                response = self.clientsocket.recv(9999999)
                file = open("D:\Serveur\RecepEntrepot1\Reponse_Entrepot1.txt","w")
                file.write(response.decode())
                file.close
                time.sleep(5)
                if TraitementRDY == 0:
                    TraitementRDY = 1
                elif TraitementRDY == 1 :
                    os.system("start D:\Serveur\Dispatchretour.exe")
            elif (IDEntrepot.decode()) == "0002":
                response = self.clientsocket.recv(9999999)
                file = open("D:\Serveur\RecepEntrepot2\Reponse_Entrepot2.txt","w")
                file.write(response.decode())
                file.close
                if TraitementRDY == 0:
                    TraitementRDY = 1
                elif TraitementRDY == 1 :
                    os.system("start D:\Serveur\Dispatchretour.exe")

        elif (IDtransac.decode()) == "0x04":
            print("IDTransaction = %s" % (IDtransac.decode()))
            IDEntrepot = self.clientsocket.recv(255)
            if (IDEntrepot.decode()) == "0001":
                while EnvoiEntrepo1RDY != 1:
                    time.sleep(1)
                EnvoiEntrepo1RDY = 0
                file = open("D:\Serveur\ConfirmationEntrepot1\Confirmation_Commande1.txt","rb")
                self.clientsocket.send(file.read())
                file.close
            elif (IDEntrepot.decode()) == "0002":
                while EnvoiEntrepo2RDY != 1:
                    time.sleep(1)
                EnvoiEntrepo2RDY = 0
                file = open("D:\Serveur\ConfirmationEntrepot2\Confirmation_Commande2.txt","rb")
                self.clientsocket.send(file.read())
                file.close


class EnvoiEntrepo1 (FileSystemEventHandler):

    def on_modified(self, event):
        global EnvoiEntrepo1RDY
        print("fichier modifier")
        time.sleep(1)
        EnvoiEntrepo1RDY = 1


class EnvoiEntrepo2 (FileSystemEventHandler):

    def on_modified(self, event):
        global EnvoiEntrepo2RDY
        print ("fichier modifier")
        time.sleep(1)
        EnvoiEntrepo2RDY = 1


tcpsock = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
tcpsock.setsockopt(socket.SOL_SOCKET, socket.SO_REUSEADDR, 1)
tcpsock.bind(("",1111))

observerentrepo1 = Observer()
observerentrepo1.schedule(EnvoiEntrepo1(), path ='D:\Serveur\ConfirmationEntrepot1', recursive=True)
observerentrepo1.start()

observerentrepo2 = Observer()
observerentrepo2.schedule(EnvoiEntrepo2(), path ='D:\Serveur\ConfirmationEntrepot2', recursive=True)
observerentrepo2.start()

global EnvoiRDY
global EnvoiEntrepo1RDY
global EnvoiEntrepo2RDY
global TraitementRDY
EnvoiEntrepo1RDY = 0
EnvoiEntrepo2RDY = 0
TraitementRDY = 0
EnvoiRDY = 0

while True:
    tcpsock.listen(10)
    print( "En écoute...")
    (clientsocket, (ip, port)) = tcpsock.accept()
    newthread = ClientThread(ip, port, clientsocket)
    newthread.start()


