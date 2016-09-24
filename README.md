# Neroblu + Vagrant + Yii2 テンプレート

# 環境構築手順

## 前準備

Vagrantに必要なツールをインストールしてください

- Virtual Box https://www.virtualbox.org/
- Vagrant http://www.vagrantup.com/

## 必要なプラグインのインストール

```sh
vagrant plugin install vagrant-omnibus
vagrant plugin install vagrant-vbguest
```

## hostsの編集

```sh
sudo vi /private/etc/hosts
172.16.1.10 neroblu.vagrant.net
```

## vagrant の開始


```sh
vagrant up
```

#### 2回目以降

次からは up するだけで vm 環境が立ち上がります

```sh
vagrant up
```

###レシピの変更があった際には provision で立ち上げてください

####すでに vagrant が立ち上がっている場合

```sh
vagrant provision
```

####まだ vagrant が立ち上がっていない場合

```sh
vagrant up -provision
```

## migration について

DBの変更はmigrationで管理しています。

変更があった場合は

```
vagrant ssh
```

```
cd /var/www/neroblu/src
php yii migrate/up
```

を実行してください
