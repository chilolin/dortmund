# Dortmund

## 0. 目次

1. [開発環境](##1-開発環境)
2. [環境構築](##2-環境構築)

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

5. DB を設定する。

```bash
$ php artisan migrate:fresh
$ php artisan db:seed
```
