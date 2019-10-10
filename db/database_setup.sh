#!/bin/bash
mysql -u root -pmysql CREATE DATABASE test
mysql -u root -pmysql test < /mysql/db.sql
