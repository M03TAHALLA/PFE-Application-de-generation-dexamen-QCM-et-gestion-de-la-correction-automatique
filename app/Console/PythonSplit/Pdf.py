import os
from PyPDF2 import PdfReader, PdfWriter

pdf_file_path = 'C:\\xampp\htdocs\\QCMProject\\storage\\app\\public\\uploads\\Etudiant.pdf'
file_base_name = pdf_file_path.replace('.pdf', '')
output_folder_path = os.path.join(os.getcwd(), 'Output/')

pdf = PdfReader(pdf_file_path)
numqustion = 9
if numqustion >= 45:
    for i in range(0, len(pdf.pages), 2):
        pdfWriter = PdfWriter()
        pdfWriter.add_page(pdf.pages[i])
        if i+1 < len(pdf.pages):
            pdfWriter.add_page(pdf.pages[i+1])

        with open(os.path.join(output_folder_path, '{0}_Pages{1}-{2}.pdf'.format(file_base_name, i+1, i+2)), 'wb') as f:
            pdfWriter.write(f)
else:
    for page_num in range(len(pdf.pages)):
        pdfWriter = PdfWriter()
        pdfWriter.add_page(pdf.pages[page_num])

        with open(os.path.join(output_folder_path, '{0}_Page{1}.pdf'.format(file_base_name, page_num+1)), 'wb') as f:
            pdfWriter.write(f)
