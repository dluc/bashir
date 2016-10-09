# Bashir

Bashir (the one who bring good news) is a setup script to initialize Bash
environments.

# Setup

An instance of Bashir is available at 
[http://dev.ai/bashir/](http://dev.ai/bashir/).

This command will setup your Linux shell:

```shell 
curl -s http://dev.ai/bashir/ > ~/.bashir && . ~/.bashir
```

# Docker

You may want to use Bashir to customize your Docker containers' shell, 
for example:

```
FROM debian:jessie

MAINTAINER Devis Lucato devis@lucato.it

LABEL Description="Debian Jessie with Bashir"

RUN \
  apt-get update && \
  apt-get -y --force-yes --no-install-recommends install curl && \
  curl -s http://dev.ai/bashir/ > ~/.bashir && . ~/.bashir && \
  apt-get autoclean && apt-get clean && rm -rf /var/lib/apt/lists/*

ENTRYPOINT ["/bin/bash"]
```

# Screenshot

![screenshot](screenshot.png)

