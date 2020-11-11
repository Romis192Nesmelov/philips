from pathlib import Path
import smtplib
from email.mime.multipart import MIMEMultipart
from email.mime.text import MIMEText
import mimetypes
from email import encoders
from email.mime.base import MIMEBase
from os.path import basename
import os

root_dir = Path(__file__).resolve().parent.parent
env = root_dir / ".env"
params = {line.strip().split('=', maxsplit=1)[0]: line.strip().split('=', maxsplit=1)[1]
          for line in open(env)
          if line.strip()}

EMAILFROM = params["MAIL_USERNAME"]
SMTP_SERVER = f'{params["MAIL_HOST"]}:{params["MAIL_PORT"]}'
SMTP_USERNAME = params["MAIL_USERNAME"]
SMTP_PASSWORD = params["MAIL_PASSWORD"]

TO = (
    'victor.makarov@freshmindcom.ru',
    'info@freshmindcom.ru',
    # 'sergey.kasyanov@philips.com',
    # 'pr@freshmindcom.ru',
)


def send_email(subject='', text='', emailto=(), filesToSend=(), html=False):
    '''
    Отправка e-mail с сообщением и вложенными файлами.
    :param subject: тема письма
    :param text: текст письма
    :param emailto: список адресов получателей
    :param filesToSend: список файлов для прикрепления
    :return:
    '''
    msg = MIMEMultipart()
    msg["From"] = EMAILFROM
    msg["To"] = ', '.join(emailto)
    msg["Subject"] = subject

    # msg.attach(MIMEText('Тестовая строка для проверки.', 'plain', 'utf-8'))

    if html:
        msg.attach(MIMEText(text, 'html', 'utf-8'))
    else:
        msg.attach(MIMEText(text, 'plain', 'utf-8'))

    # Прикрепление файлов
    for fileToSend in filesToSend:
        ctype, encoding = mimetypes.guess_type(fileToSend)
        if ctype is None or encoding is not None:
            ctype = "application/octet-stream"
        maintype, subtype = ctype.split("/", 1)
        attachment = MIMEBase(maintype, subtype)

        with open(fileToSend, "rb") as fp:
            attachment.set_payload(fp.read())

        encoders.encode_base64(attachment)
        attachment.add_header("Content-Disposition", "attachment", filename=basename(fileToSend))
        msg.attach(attachment)

    # Связь с сервером и отправка сообщения
    server = smtplib.SMTP(SMTP_SERVER)
    # server.starttls()
    server.login(SMTP_USERNAME, SMTP_PASSWORD)
    server.sendmail(EMAILFROM, emailto, msg.as_string())
    server.quit()


if __name__ == '__main__':
    stat_file = os.path.join(os.path.join(os.path.dirname(os.path.abspath(__file__)), 'stats'), 'stat_action.csv')
    send_email(subject='Статистика philips-shell-promo.ru',
               text='В приложенном файле находится статистика акции с сайта philips-shell-promo.ru.\n',
               emailto=TO,
               filesToSend=(stat_file,),
               html=False)
