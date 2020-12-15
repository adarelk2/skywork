#!/bin/sh
V="2.0"

FILES=http://gamepanel.co.il/install
FILEST=http://gt-panel.esy.es
SAMPFILES=http://files.sa-mp.com/samp037svr_R2-1.tar.gz
SAMPNAME=samp037svr_R2-1.tar.gz
clear
echo -e "\e[31m= - = - = - = - = - = - = - = - = - = - =\031"
echo -e "\e[31m- Welcome To GamePanel $V Installer -\031"
echo -e "\e[31m= - = - = - = - = - = - = - = - = - = - =\031"

sleep 1

if [ -d "/home/files" ]; then

printf "Would you like to update the files or one server ? [A\O]:" && read wtu

if [ $wtu == "A" ] || [ $wtu == "a" ]
then
printf "Would you like to install Steam ? [Y\N]:" && read Steam
printf "Would you like to update CSGO ? [Y\N]:" && read CSGO
printf "Would you like to update CSS ? [Y\N]:" && read CSS
printf "Would you like to update TF2 ? [Y\N]:" && read TF
printf "Would you like to update DOD:S ? [Y\N]:" && read DODS
printf "Would you like to update DOD ? [Y\N]:" && read DOD
printf "Would you like to update CS1.6 ? [Y\N]:" && read CS16
if [ $CS16 == "Y" ] || [ $CS16 == "y" ]
then
printf "Would you like to install CS16 Original\Cracked ? [O\C]:" && read COO
fi
printf "Would you like to update CS:Zero ? [Y\N]:" && read CSZ
printf "Would you like to update GMod ? [Y\N]:" && read GMod
printf "Would you like to update SAMP ? [Y\N]:" && read SAMP
printf "Would you like to update Minecraft ? [Y\N]:" && read Minecraft

echo -en "\033[1;33m" && echo "Updating GameServers Files..." && echo -en "\033[m"
cd ~
mkdir /home/files
if [ $Steam == "Y" ] || [ $Steam == "y" ]
then
echo -en "\033[1;33m" && echo "Install SteamCMD..." && echo -en "\033[m"
cd /home/files
mkdir Steam
cd Steam
wget https://steamcdn-a.akamaihd.net/client/installer/steamcmd_linux.tar.gz
tar -xvzf steamcmd_linux.tar.gz
sleep 0.3
else
cd /home/files/Steam/
fi
if [ $CSGO == "Y" ] || [ $CSGO == "y" ]
then
echo -en "\033[1;33m" && echo "Updating CSGO..." && echo -en "\033[m"
./steamcmd.sh +login anonymous +force_install_dir ../csgo +app_update 740 validate +quit
cd /home/files/csgo/csgo
wget $FILES/confs/csgoserver.cfg
mv csgoserver.cfg server.cfg
cd /home/files/csgo/csgo/cfg
echo "sv_setsteamaccount \"358914925D54F25CBE09AF3C36A40B46\"" >> server.cfg
chmod 777 server.cfg
cd /home/files/Steam
fi
if [ $CSS == "Y" ] || [ $CSS == "y" ]
then
echo -en "\033[1;33m" && echo "Updating CS:S..." && echo -en "\033[m"
./steamcmd.sh +login anonymous +force_install_dir ../css +app_update 232330 validate +quit
cd /home/files/css/cstrike
wget $FILES/confs/csserver.cfg
mv csserver.cfg server.cfg
cd /home/files/Steam
fi
if [ $TF == "Y" ] || [ $TF == "y" ]
then
echo -en "\033[1;33m" && echo "Updating TF2..." && echo -en "\033[m"
./steamcmd.sh +login anonymous +force_install_dir ../tf2 +app_update 232250 validate +quit
cd /home/files/tf2/tf
wget $FILES/confs/tfserver.cfg
mv tfserver.cfg server.cfg
cd /home/files/Steam
fi
if [ $DODS == "Y" ] || [ $DODS == "y" ]
then
echo -en "\033[1;33m" && echo "Updating DOD:S..." && echo -en "\033[m"
./steamcmd.sh +login anonymous +force_install_dir ../dods +app_update 232290 validate +quit
fi
if [ $DOD == "Y" ] || [ $DOD == "y" ]
then
echo -en "\033[1;33m" && echo "Updating DOD..." && echo -en "\033[m"
./steamcmd.sh +login anonymous +force_install_dir ../dod +app_set_config 90 mod dod +app_update 90 validate +quit
fi
if [ $Minecraft == "Y" ] || [ $Minecraft == "y" ]
then
echo -en "\033[1;33m" && echo "Download Minecraft..." && echo -en "\033[m"
cd /home/files
wget $FILEST/minecraft.zip
unzip minecraft.zip
fi
if [ $CS16 == "Y" ] || [ $CS16 == "y" ]
then
if [ $COO == "O" ] || [ $COO == "o" ]
then
echo -en "\033[1;33m" && echo "Updating CS1.6..." && echo -en "\033[m"
./steamcmd.sh +login anonymous +force_install_dir ../cs +app_set_config 90 +app_update 90 validate +quit
cd /home/files
wget $FILEST/mods.zip
unzip mods.zip
rm -rf mods.zip
else
cd /home/files
wget $FILEST/mods.zip
unzip mods.zip
rm -rf mods.zip
wget $FILEST/cs.zip
unzip cs.zip
rm -rf mods.zip
cd /home/files/Steam
fi
fi
if [ $CSZ == "Y" ] || [ $CSZ == "y" ]
then
echo -en "\033[1;33m" && echo "Updating CSZ..." && echo -en "\033[m"
./steamcmd.sh +login anonymous +force_install_dir ../csz +app_set_config 90 mod czero +app_update 90 validate +quit
fi
if [ $GMod == "Y" ] || [ $GMod == "y" ]
then
echo -en "\033[1;33m" && echo "Updating GMod..." && echo -en "\033[m"
./steamcmd.sh +login anonymous +force_install_dir ../gmod +app_set_config 4020 mod czero +app_update 4020 validate +quit
cd /home/files/gmod
wget $FILES/libs/libstdc++.so.6
cd bin
wget $FILES/libs/libs.zip
unzip libs.zip
cd /home/files/gmod/garrysmod
wget $FILES/confs/gmserver.cfg
mv gmserver.cfg server.cfg
cd /home/files/Steam
fi
if [ $SAMP == "Y" ] || [ $SAMP == "y" ]
then
echo -en "\033[1;33m" && echo "Updating SAMP..." && echo -en "\033[m"
cd ../
wget $SAMPFILES
tar -xvf $SAMPNAME
rm -fr $SAMPNAME
mv samp03 samp
cd samp
echo "rcon_password GTPanel" >> server.cfg
echo "weburl wWw.GamePanel.co.il" >> server.cfg
fi
sleep 0.3
else
printf "What is the server name:" && read sn
echo -en "\033[1;33m" && echo "Updating CSGO..." && echo -en "\033[m"
cd /home/files/Steam
./steamcmd.sh +login anonymous +force_install_dir /home/$sn +app_update 740 validate +quit
fi
exit 0
else
echo ""
fi

printf "Would you like to change SSH Port ? [Y\N]:" && read SSH
printf "Would you like to install ftp Manual\AutoMatic ? [M\A]:" && read Proftpd
printf "Would you like to install CSGO ? [Y\N]:" && read CSGO
printf "Would you like to install CSS ? [Y\N]:" && read CSS
printf "Would you like to install TF2 ? [Y\N]:" && read TF
printf "Would you like to install DOD:S ? [Y\N]:" && read DODS
printf "Would you like to install DOD ? [Y\N]:" && read DOD
printf "Would you like to install CS1.6 ? [Y\N]:" && read CS16
if [ $CS16 == "Y" ] || [ $CS16 == "y" ]
then
printf "Would you like to install CS16 Original\Cracked ? [O\C]:" && read COO
fi
printf "Would you like to install CS:Zero ? [Y\N]:" && read CSZ
printf "Would you like to update GMod ? [Y\N]:" && read GMod
printf "Would you like to install SAMP ? [Y\N]:" && read SAMP
printf "Would you like to install Minecraft ? [Y\N]:" && read Minecraft


echo -en "\033[1;33m" && echo "Starting installation..." && echo -en "\033[m"
sleep 0.6

echo -en "\033[1;33m" && echo "Update YUM..." && echo -en "\033[m"
sleep 0.2
yum update -y

echo -en "\033[1;33m" && echo "Install Gcc..." && echo -en "\033[m"
sleep 0.2
yum install gcc -y

echo -en "\033[1;33m" && echo "Installing WGET..." && echo -en "\033[m"
sleep 0.2
yum install -y wget

echo -en "\033[1;33m" && echo "Installing SCREEN..." && echo -en "\033[m"
sleep 0.2
yum install -y screen

echo -en "\033[1;33m" && echo "Installing ZIP UNZIP..." && echo -en "\033[m"
sleep 0.2
yum install -y zip unzip

cd /home/
mkdir files
cd files

echo -en "\033[1;33m" && echo "Checking operating system bits..." && echo -en "\033[m"
sleep 0.7

MACHINE_TYPE=`uname -m`
if [ ${MACHINE_TYPE} == 'x86_64' ]; then
	yum install -y glibc.i686 libstdc++.i686
fi

echo -en "\033[1;33m" && echo "Installing JAVA..." && echo -en "\033[m"
yum install -y java-1.6.0-openjdk
sleep 0.3

echo -en "\033[1;33m" && echo "Installing JAVA..." && echo -en "\033[m"
yum install -y java
sleep 0.3

echo -en "\033[1;33m" && echo "Stoping IPTables..." && echo -en "\033[m"
service iptables stop
chkconfig iptables off
sleep 0.3

echo -en "\033[1;33m" && echo "Installing NANO..." && echo -en "\033[m"
sleep 0.2
yum install -y nano

echo -en "\033[1;33m" && echo "Installing ProFTPD..." && echo -en "\033[m"
if [ -f "/etc/proftpd.conf" ]; then
echo "ProFTPD already installed."
else
if [ $Proftpd == "M" ] || [ $Proftpd == "m" ]; then
cd ~
cd /tmp/
wget $FILES/ftp/proftpd-1.3.4a.tar.gz
tar -xf proftpd-1.3.4a.tar.gz
cd proftpd-1.3.4a
./configure --sysconfdir=/etc
make
make install
cd ..
rm -rf proftpd-1.3.4a
ln -s /usr/local/sbin/proftpd /usr/sbin/proftpd
cd ~
cd /etc/init.d/
wget $FILES/ftp/proftpd
cd ../
wget $FILES/ftp/proftpd.tar.gz
rm -fr proftpd.conf
tar -xvf proftpd.tar.gz
rm -fr proftpd.tar.gz
cd ~ 
/etc/init.d/proftpd restart
chkconfig --levels 235 proftpd on
else
rpm -iUvh http://dl.fedoraproject.org/pub/epel/6/x86_64/epel-release-6-8.noarch.rpm
yum -y install proftpd
service proftpd restart
chkconfig --level 3 proftpd on
fi
fi
sleep 0.3

echo -en "\033[1;33m" && echo "Install SteamCMD..." && echo -en "\033[m"
cd /home/files
mkdir Steam
cd Steam
wget https://steamcdn-a.akamaihd.net/client/installer/steamcmd_linux.tar.gz
tar -xvzf steamcmd_linux.tar.gz
sleep 0.3

echo -en "\033[1;33m" && echo "DownLoading GameServers Files..." && echo -en "\033[m"
cd ~
cd /home/files/Steam/
if [ $CSGO == "Y" ] || [ $CSGO == "y" ]
then
echo -en "\033[1;33m" && echo "Download CSGO..." && echo -en "\033[m"
./steamcmd.sh +login anonymous +force_install_dir ../csgo +app_update 740 validate +quit
cd /home/files/csgo/csgo
wget $FILES/confs/csgoserver.cfg
mv csgoserver.cfg server.cfg
cd /home/files/csgo/csgo/cfg
echo "sv_setsteamaccount \"358914925D54F25CBE09AF3C36A40B46\"" >> server.cfg
chmod 777 server.cfg
cd /home/files/Steam/
fi
if [ $CSS == "Y" ] || [ $CSS == "y" ]
then
echo -en "\033[1;33m" && echo "Download CS:S..." && echo -en "\033[m"
./steamcmd.sh +login anonymous +force_install_dir ../css +app_update 232330 validate +quit
fi
if [ $TF == "Y" ] || [ $TF == "y" ]
then
echo -en "\033[1;33m" && echo "Download TF2..." && echo -en "\033[m"
./steamcmd.sh +login anonymous +force_install_dir ../tf2 +app_update 232250 validate +quit
fi
if [ $DODS == "Y" ] || [ $DODS == "y" ]
then
echo -en "\033[1;33m" && echo "Download DOD:S..." && echo -en "\033[m"
./steamcmd.sh +login anonymous +force_install_dir ../dods +app_update 232290 validate +quit
fi
if [ $DOD == "Y" ] || [ $DOD == "y" ]
then
echo -en "\033[1;33m" && echo "Download DOD..." && echo -en "\033[m"
./steamcmd.sh +login anonymous +force_install_dir ../dod +app_set_config 90 mod dod +app_update 90 validate +quit
fi
if [ $Minecraft == "Y" ] || [ $Minecraft == "y" ]
then
echo -en "\033[1;33m" && echo "Download Minecraft..." && echo -en "\033[m"
cd /home/files
wget $FILEST/minecraft.zip
unzip minecraft.zip
fi
if [ $CS16 == "Y" ] || [ $CS16 == "y" ]
then
if [ $COO == "O" ] || [ $COO == "o" ]
then
echo -en "\033[1;33m" && echo "Updating CS1.6..." && echo -en "\033[m"
./steamcmd.sh +login anonymous +force_install_dir ../cs +app_set_config 90 +app_update 90 validate +quit
cd /home/files
wget $FILEST/mods.zip
unzip mods.zip
rm -rf mods.zip
else
cd /home/files
wget $FILEST/mods.zip
unzip mods.zip
rm -rf mods.zip
wget $FILEST/cs.zip
unzip cs.zip
rm -rf mods.zip
cd /home/files/Steam
fi
fi
if [ $CSZ == "Y" ] || [ $CSZ == "y" ]
then
echo -en "\033[1;33m" && echo "Updating CSZ..." && echo -en "\033[m"
./steamcmd.sh +login anonymous +force_install_dir ../csz +app_set_config 90 mod czero +app_update 90 validate +quit
fi
if [ $GMod == "Y" ] || [ $GMod == "y" ]
then
echo -en "\033[1;33m" && echo "Updating GMod..." && echo -en "\033[m"
./steamcmd.sh +login anonymous +force_install_dir ../gmod +app_set_config 4020 mod czero +app_update 4020 validate +quit
cd /home/files/gmod
wget $FILES/libs/libstdc++.so.6
cd bin
wget $FILES/libs/libs.zip
unzip libs.zip
cd /home/files/Steam
fi
if [ $SAMP == "Y" ] || [ $SAMP == "y" ]
then
echo -en "\033[1;33m" && echo "Download SAMP..." && echo -en "\033[m"
cd ../
wget $SAMPFILES
tar -xvf $SAMPNAME
rm -fr $SAMPNAME
mv samp03 samp
cd samp
echo "rcon_password GTPanel" >> server.cfg
echo "weburl wWw.GamePanel.co.il" >> server.cfg
fi
sleep 0.3

if [ $SSH == "Y" ] || [ $SSH == "y" ]
then
echo -en "\033[1;33m" && echo "Changing SSH port..." && echo -en "\033[m"
port=$(( 100+( $(od -An -N2 -i /dev/random) )%(40000-1024+1) ))
while :
do(echo >/dev/tcp/localhost/$port) &>/dev/null &&  port=$(( 100+( $(od -An -N2 -i /dev/random) )%(40000-1000+1) )) || break
done
echo ''
echo -en "\033[1;33m" && echo "SSH Port: "$port"" && echo -en "\033[m"
echo ''
fi
echo -e "\e[92mGTPanel successfully installed in your server!"
echo -e "\e[92m- - Copyright (C) 2015 - 2017 GamePanel.co.il Created By NaorCN & GameHost  - -"
if [ $SSH == "Y" ] || [ $SSH == "y" ]
then
echo "Port $port" >> /etc/ssh/sshd_config
service sshd restart
fi
printf "Would you like to Delete install file ? [Y\N]:" && read insfile
if [ $insfile == "Y" ] || [ $insfile == "y" ]
then
cd ~
rm -rf install.sh
rm -rf install.sh*
fi
printf "Would you like to Reboot your server now ? [Y\N]:" && read Reboot
if [ $Reboot == "Y" ] || [ $Reboot == "y" ]
then
shutdown -r now
fi
exit 0