# Dortmund

<img width="1440" alt="スクリーンショット 2021-10-31 13 33 55" src="https://user-images.githubusercontent.com/67007822/139568026-7b52a6ec-356b-4181-a8c5-5fdf76016a3b.png">

<img width="1440" alt="スクリーンショット 2021-10-31 13 34 36" src="https://user-images.githubusercontent.com/67007822/139568034-db05e0ee-6d2a-4212-84fb-f9c4ec2bd45e.png">

--- 

## 0. 目次

1. [開発環境](#1-開発環境)
2. [環境構築](#2-環境構築)

---

## 1. 開発環境

| 名前                                                 | バージョン |
| ---------------------------------------------------- | ---------- |
| [XAMPP](https://www.apachefriends.org/jp/index.html) | 8.0.10     |
| [PHP](https://www.php.net/)                          | 8.0.2      |
| [Composer](https://getcomposer.org/)                 | 2.1.9      |
| [Node.js](https://nodejs.org/en/)                    | ^14        |

---

## 2. 環境構築

1.  開発環境をローカル環境にインストールする。

2.  リポジトリを XAMPP の`htdocs`配下にクローンする。

    ```bash
    $ git clone https://github.com/chilolin/dortmund.git
    ```

3.  `.env.example`を参考にして`.env`をルートに作成する。

4.  ローカルサーバを立ち上げる。

```bash
$ composer install
$ npm install
$ php artisan serve
```

5. XAMPP を起動して DB を設定する。

```bash
# phpmyadminなどを使って、dortmundデータベースを作る。
$ php artisan migrate:fresh
$ php artisan db:seed
```
