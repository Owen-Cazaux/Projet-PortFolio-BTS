#!/bin/sh
set -eu

PORT="${PORT:-10000}"
case "$PORT" in
    ''|*[!0-9]*)
        echo "PORT must be a numeric TCP port" >&2
        exit 1
        ;;
esac

sed "s/__PORT__/${PORT}/g" \
    /etc/nginx/templates/nginx.conf.template \
    > /etc/nginx/http.d/default.conf

exec /usr/bin/supervisord -n -c /etc/supervisord.conf