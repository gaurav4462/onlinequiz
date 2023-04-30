import win32api
import os
import mysql.connector
# from datatable import f


def connectivity(hostname,username,password,db_name):
    conn=mysql.connector.connect(
    host=hostname,
    user=username,
    passwd=password,
    db=db_name)
    return conn
conn=connectivity("localhost","root","gaurav","users")

query = '''SELECT * FROM data1'''
conn1=conn.cursor()
conn1.execute(query)
records = conn1.fetchall()

if os.path.exists("answer.txt"):
   os.remove("answer.txt")


with open("answer.txt","a") as f:
    f.write("queid                      ansid ")
    f.write("\n")



for i in range(0,5):
    with open("answer.txt","a") as f:
        f.write("\n")
        f.write(f"  {records[i][0]}                          {records[i][1]}    ")
        f.write("\n")
    
Pdf = win32api.ShellExecute(0,"print","answer.txt",None,".",0)
os.startfile(f"{Pdf}.pdf")


