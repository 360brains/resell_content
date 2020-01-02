#!/bin/bash

curl -X POST "https://api.cloudflare.com/client/v4/zones/0adba8ba80272460bd242bb3503d8987/purge_cache" \
     -H "X-Auth-Email: salman@sunztech.com" \
     -H "X-Auth-Key: 529a6269795e78cc3a6246d06074c82949967" \
     -H "Content-Type: application/json" \
     --data '{"purge_everything":true}'
