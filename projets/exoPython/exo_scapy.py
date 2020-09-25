#!/user/env/python7
# -*-encoding:utf-8-*-
from scapy.all import *

#Scapy ping ip incrementation
plage = '10.1.20.20-29'

packet = Ether() / IP(dst='10.1.20.175',src=plage) / ICMP()
packet.show()
sendp(packet)
