# AuthorizationBundle
## Для использования бандла необходимо
### Установить бандл командой
    composer require mixasmix/auth_service_bundle

### создать конфиг файл config/packages/auth.yaml с таким содержимым
    auth:
        service_url: '%env(AUTH_SERVER_URL)%'
        client_id: '%env(AUTH_CLIENT_ID)%'
        client_secret: '%env(AUTH_CLIENT_SECRET)%'
        redirect_uri: '%env(AUTH_REDIRECT_URI)%'
        url_authorize: '%env(AUTH_URL_AUTHORIZE)%'
        url_access_token: '%env(AUTH_URL_ACCESS_TOKEN)%'
        url_resource_owner_details: '%env(AUTH_URL_RESOURCE_OWNER_DETAILS)%'

И добавить в .env файл переменные, например

    # адрес авторизационного сервера
    AUTH_SERVER_URL='http://auth-server.example'
    # Ид клиента
    AUTH_CLIENT_ID='0cbfd837a6515b7991e79fb905459cb3'
    # секретный код клиента
    AUTH_CLIENT_SECRET='0cbfd837a6515b7991e79fb905459cb3'
    # адрес, на который будет произведен редирект
    AUTH_REDIRECT_URI='http://client.example'
    # эндпоинт для получения авторизационного кода
    AUTH_URL_AUTHORIZE='/authorize'
    # эндпоинт для получения токена
    AUTH_URL_ACCESS_TOKEN='/token'
    # эндпоинт для получения информации по пользователю
    AUTH_URL_RESOURCE_OWNER_DETAILS='/userinfo'

### подключить машруты в /config/routes.yaml
    auth:
        resource: '@AuthBundle/Controller/AuthorizationController.php'
        type: annotation