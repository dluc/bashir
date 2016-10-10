<?php
$vmajor = "v1";
$vminor = "2016-10-09";

date_default_timezone_set("UTC");

header("Content-Type: text/plain");
header("Last-Modified: " . date("r", strtotime($vminor)));
header("Expires: " . date("r", time() + 86400));
header("Cache-Control: public, max-age=86400");
header("Vary: None");

$header = array(
    "",
    "Bashir - $vmajor.$vminor",
    "Maintainer : Devis Lucato http://lucato.it",
    "Source     : https://github.com/dluc/bashir",
    "Setup      : curl -s https://dev.ai/bashir/$vmajor |bash && . ~/.bashir",
    "",
    "Installed on " . date("r"),
    ""
);

foreach ($header as $v) echo "## " . str_pad($v, 74) . " ##\n"; 
?>

bashir_enable() {
    if [ ! -f ~/.bashir ]; then
        curl -s https://dev.ai/bashir/<?php echo $vmajor; ?> > ~/.bashir
    fi

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
}

bashir_do() {
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

    alias bashirshow='curl -s https://dev.ai/bashir/<?php echo $vmajor; ?>'
    alias bashirupgrade='curl -s https://dev.ai/bashir/<?php echo $vmajor; ?> |bash && . ~/.bashir'

    export HISTCONTROL=ignorespace:ignoredups
    export HISTTIMEFORMAT='%F %T '
    export HISTSIZE=32767
    export HISTFILESIZE=3276700

    export PS1="\n\e[32;44;1m \h\e[37m - [\u] \e[0m\e[30;47m  (\t)  \e[0m\n\w :# "

    export PATH="$HOME/bin:$PATH"
}

bashir_enable

if [ ! -z "$PS1" ]; then
    bashir_do
fi

