FROM debian:jessie

MAINTAINER Devis Lucato devis@lucato.it

LABEL Description="Debian Jessie with Bashir"

RUN \
  apt-get update && \
  apt-get -y --force-yes --no-install-recommends install curl && \
  curl -s https://dev.ai/bashir/v1 |bash && \
  apt-get autoclean && apt-get clean && rm -rf /var/lib/apt/lists/*

ENTRYPOINT ["/bin/bash"]
