#!/bin/bash
rsync -rRql --exclude sync.sh --exclude .env.example --exclude .git --exclude readme.md --exclude tests  --exclude .gitignore --exclude composer.lock ./ tendai@flequesboard.com:~/iflavarel.ilearnfb.com/
