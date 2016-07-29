Запуск докера под windows 10 x64
  
1. Отключить HYPER-V
2. Установить VirtualBox
3. Установить Docker for windows
4. Установить Docker tools for windows.
5. Создать виртуальную линукс-машину:  
docker-machine create __default__(имя машины)
6.	Получить переменные окружения:  
docker-machine env __default__
7.	Прописать настройки в переменные среды
8.	Создать для виртуальной машины ШАРУ, например:  
имя: c/dockers  
путь: c:\dockers  
9.	Запустить виртуальную машину:  
docker-machine ssh default
10.	В виртуальной машине создать файл:  
/var/lib/boot2docker/bootlocal.sh  
следующего содержания:  
mkdir -p /c/dockers/  
mount -t vboxsf c/dockers /c/dockers/
11.	Перезапустить виртуальную машину.

