import PyPDF2 as pd
import mysql.connector


mydb = mysql.connector.connect(
  host="localhost",
  user="root",
  password="gaurav",
  database="users"
)

mycursor = mydb.cursor()

sql = "DROP TABLE IF EXISTS ans"

mycursor.execute(sql)


mycursor = mydb.cursor()

mycursor.execute("CREATE TABLE ans ( Correct Varchar(10),Incorrect Varchar(10),Unattempted Varchar(10) )")

# Question paper reading
file = open('partials/question.pdf','rb')
file
pr = pd.PdfReader(file)
#print(pr)
num_pages=len(pr.pages)
#print(num_pages)
text=""

for page in range(num_pages):
    pdf_page = pr.pages[page]
    page_text = pdf_page.extract_text()
    text += page_text
#print(text)
final_list=text.splitlines() 
#print(final_list)

QI =[]
RI =[]
for k in range(0,len(final_list)):
    
    if "question_id" in final_list[k] :
        p=(final_list[k].split())
        QI.append(p[-1])
            
    if  "responce_id" in final_list[k] :
        r=final_list[k].split()
        RI.append(r[-1])
        
QR = dict(zip(QI, RI))

#print(QR)  

# Answer key Reading
file_ans = open('partials/answer.pdf','rb')
pr_ans = pd.PdfReader(file_ans)
num_pages_ans=len(pr_ans.pages)
text_ans=""

for page_ans in range(num_pages_ans):
    pdf_page_ans = pr_ans.pages[page_ans]
    page_text_ans = pdf_page_ans.extract_text()
    text_ans += page_text_ans

final_list_ans=text_ans.split()

QI_ans=[]
RI_ans=[]

for item in range(2,len(final_list_ans)) :    # starts with 2 because fisrt two elements of list are headings
    if item%2==0:
        
        QI_ans.append(final_list_ans[item])
        
    else:
        RI_ans.append(final_list_ans[item])
        
QR_ans = dict(zip(QI_ans, RI_ans))

#print(QR_ans)         

# Score calculation
values=list(QR.values())
values_ans=list(QR_ans.values())
Correct_ans=0
Incorrect_ans=0
Unattempted_ans=0
for k in range(0,len(values)):
    
    if values[k]==values_ans[k]:
        Correct_ans +=1
        mycursor = mydb.cursor()
        sql = "INSERT INTO ans (Correct) VALUES (%s)"
        val = (f"{k+1}")
        mycursor.execute(sql, (val,))
        mydb.commit()


        
    else:
        if values[k]=='0':
            Unattempted_ans +=1
            mycursor = mydb.cursor()
            sql = "INSERT INTO ans (Unattempted) VALUES (%s)"
            val = (f"{k+1}")
            mycursor.execute(sql, (val,))

            mydb.commit()
        else:
            Incorrect_ans +=1
            mycursor = mydb.cursor()
            sql = "INSERT INTO ans (Incorrect) VALUES (%s)"
            val = (f"{k+1}")
            mycursor.execute(sql, (val,))

            mydb.commit()
            
            
# print(f"Number of correct Anwers {Correct_ans} \n")     
# print(f"Number of Incorrect Anwers {Incorrect_ans}\n")
# print(f"Number of Unattempted Questions {Unattempted_ans}\n")        
# print(type(int(list(QR.keys())[1])))
print(type(k))


