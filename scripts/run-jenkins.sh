#!/bin/bash

docker run --name jenkins --detach \
  --network host \
  --name jenkins \
  jenkins/jenkins:latest
