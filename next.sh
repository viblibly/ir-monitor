#!/usr/bin/expect

# вызываем команду. VLC можно управлять по телнету
spawn telnet 172.16.0.1 4212

# ждем строку с запросом пароля
expect "Password:"
# посылаем пароль
send "passwd\n"
# ожидаем приглашение к вводу
expect ">"
# посылаем команду, ждем символа конца строки (eof)
send "next\n"
send "quit\n"

expect eof
