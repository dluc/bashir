<?php
$version = "2016-10-09";

header("Content-Type: text/plain");
$now = date("c");
?>
##
## Bashir - v<?php echo $version; ?>

## by Devis Lucato http://lucato.it
##
## Setup     : curl -s http://dev.ai/bashir/ > ~/.bashir && . ~/.bashir
## Installed : <?php echo $now; ?>

##

if [ -f ~/.bashrc ]; then
    BASHCFG=~/.bashrc
elif [ -f ~/.bash_profile ]; then
    BASHCFG=~/.bash_profile
elif [ -f ~/.profile ]; then
    BASHCFG=~/.profile
fi

if [ ! -z "$BASHCFG" ]; then
    if ! grep -q "\.bashir" $BASHCFG; then
       echo "" >> $BASHCFG
       echo "source ~/.bashir" >> $BASHCFG
    fi
fi

if [ -z "$PS1" ]; then
    return
fi

eval `dircolors -b`

alias ls='ls --color=auto'
alias l='ls --color=auto -lAF'
alias ll='l|less'
alias rm='rm -i'
alias cp='cp -ia'
alias mv='mv -i'
alias grep='grep --color=auto'
alias df='df -h'
alias nano='nano -cESm --tabsize=4'
alias mkdir='mkdir -p'

alias bashirshow='curl -s http://dev.ai/bashir/'
alias bashirupgrade='curl -s http://dev.ai/bashir/ > ~/.bashir && . ~/.bashir'

export HISTCONTROL=ignorespace:ignoredups
export HISTTIMEFORMAT='%F %T '
export HISTSIZE=32767
export HISTFILESIZE=3276700

export PS1="\n\e[32;44;1m \h\e[37m - [\u] \e[0m\e[30;47m  (\t)  \e[0m\n\w :# "

export PATH="$HOME/bin:$PATH"
