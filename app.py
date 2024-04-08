import mysql.connector


host = 'serwer2325179.home.pl/sql'
user = '37526988_test'
password = '123qwe!!!'
database = 'mysql8'


try:
    conn = mysql.connector.connect(
        host=host,
        user=user,
        password=password,
        database=database
    )
    if conn.is_connected():
        print('Połączono z bazą danych')

except mysql.connector.Error as e:
    print(f'Błąd połączenia z bazą danych: {e}')
finally:

    if 'conn' in locals() and conn.is_connected():
        conn.close()
        print('Połączenie z bazą danych zamknięte')
