import win32api
import os
import mysql.connector
from datatable import f
from fpdf import FPDF


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

if os.path.exists("gaurav.txt"):
   os.remove("gaurav.txt")

mycursor = conn.cursor()

query = "SELECT Correct FROM `ans` Where Correct IS NOT NULL"
conn2=conn.cursor()
conn2.execute(query)
records1 = conn2.fetchall()
if records1:
    g = records1
else:
    g =0

for i in range(0,5):

    mycursor = conn.cursor()

    sql = f"SELECT * FROM questions WHERE queid = {records[i][0]} "

    mycursor.execute(sql)

    myresult = mycursor.fetchall()


    for x in myresult:

        if records[i][2] != "a" and records[i][2] != "b" and records[i][2] != "c" and records[i][2] != "d" :
            u = 0
        else :
            u = records[i][2]

        query = "SELECT Correct FROM `ans` Where Correct IS NOT NULL"
        conn2=conn.cursor()
        conn2.execute(query)
        records1 = conn2.fetchall()
        if records1:
            g = 1
        else:
            g = 0

        
        
        with open("gaurav.txt","a") as f:
            f.write(f"                            Score {g}/1")
            f.write("\n")
            f.write(f"{i+1}. {x[0]}",)
            f.write("\n")
            f.write(f"                          question_id = {records[i][0]}",)
            f.write("\n")
            f.write(f"a. {x[1]}",)
            f.write("\n")
            f.write(f"b. {x[2]}",)
            f.write("\n")
            f.write(f"c. {x[3]}",)
            f.write("\n")
            f.write(f"d. {x[4]}",)
            f.write("\n")
            f.write(f"                          response_id = {u}",)
            f.write("\n")
            f.write(f"                          answer_id = {records[i][1]}",)
            f.write("\n") 
            f.write("---------------------------------")
            f.write("\n")
            f.write("\n")


Pdf = win32api.ShellExecute(0,"print","gaurav.txt",None,".",0)
os.startfile(f"{Pdf}.pdf")


