#!/user/env/python7
# -*-encoding:utf-8-*-
from scapy.all import *

data='coucou je suis Max'
scap_data=Ether() / IP(dst='10.1.20.175', src='10.1.20.2') / TCP() /data
sendp(scap_data)
