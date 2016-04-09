# Синонимы адресов и редиректы

Используется для сохранения работоспособности старых опубликованных ссылок.

Конфиг Alias::$conf. Все перенаправления сохраняют GET параметры после вопроса.
```json
{
	hard:{ //указывается путь от корня
		"oldname/test":"newname/bla"
	}
	part:{ //Замена части адреса с сохранением оставшейся части пути после слэша
		"Каталог":"catalog",
		"Блог":"blog"
	}
}
```

После одключнеия проверить можно с помощью адресов
urlalias-hard-test будет переход на urlalias-hard-ok
urlalias-part-test-bla будет переход на urlalias-part-ok-bla
Это перенаправления по умолчанию.

Слэш в конце адресе при жёстком совпадение (hard) игнорируется. "oldname/test":"newname/bla" адрес "oldname/test/" также удовлетворит условие и будет переход на "newname/bla".

## Запуск
```php
\infrajs\alias\Alias::init(); //проверит условия hard и part и при совпадении выполнит 301 редирект
```

## Вместе с Infrajs
После установки подключается автоматически [infrajs/config](https://github.com/infrajs/config)