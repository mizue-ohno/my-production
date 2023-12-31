# 「What's in my closet ?」

## 概要
自分が所持している洋服等のアイテムの把握は難しく、よく似た服を購入してしまったり、組み合わせが難しい服を購入して失敗してしまう経験がよくある。
そこで、自分の所有している洋服のアイテムを外出先でも確認しやすくしたいと思った。
本システムでは、自分が所有している洋服のアイテムをwebサイト上で管理し、
買い物の効率化、無駄の削減を目的とする。

## 主な機能
- ログイン・ログアウト機能
- アイテム一覧画面
- アイテムの新規登録、編集、削除
- ほしいもの（まだ買うか迷っているもの）一覧画面
- ほしいもの（まだ買うか迷っているもの）の新規登録、編集、削除
- ログインユーザーの情報更新機能
- 一覧画面の複数検索機能

  以下、管理者権限アカウントのみ可能な機能（is_admin = 1）
- 登録ユーザーの一覧画面
- 登録ユーザーの編集、管理者権限の付与、 剥奪
- 登録ユーザーすべての登録アイテム、ほしいものの閲覧、編集、削除

## 開発環境
 PHP 8.0.25  
 MySQL 10.4.27-MariaDB  
 Laravel 8.83.27

 ## システム閲覧
 [アプリケーションページへ](https://ohno-production-c47bdeb342f8.herokuapp.com/)

 ### テストアカウント情報
 管理者アカウント  
 メールアドレス：kanri@mail.com  
 パスワード：password  

 一般ユーザーアカウント  
 メールアドレス：mizue@mail.com  
 パスワード：password