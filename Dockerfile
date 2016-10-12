FROM ubuntu:16.04
RUN mkdir /code
WORKDIR /code
RUN apt-get update && apt-get install --yes php7.0 php7.0-mysql
