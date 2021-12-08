#!/bin/sh

USER=$1
NEW_UID=$2
NEW_GID=$3

OLD_UID="$(id -u $USER)"
OLD_GID="$(id -g $USER)"

find / -user "$USER" -exec chown "$NEW_UID":"$NEW_GID" {} \; 2>/dev/null

# $ANY is a shorthand regex
# It should capture any field in /etc/passwd or /etc/group
ANY="\([^:]*\)"

# Patch /etc/passwd
OLD_PASSWD="^$USER:$ANY:$OLD_UID:$OLD_GID:$ANY:$ANY:"
NEW_PASSWD="$USER:\1:$NEW_UID:$NEW_GID:\2:$WORKDIR:"
sed -i "s|$OLD_PASSWD|$NEW_PASSWD|" /etc/passwd

# Patch /etc/group
OLD_GROUP="^$ANY:$ANY:$OLD_GID:"
NEW_GROUP="\1:\2:$NEW_GID:"
sed -i "s|$OLD_GROUP|$NEW_GROUP|" /etc/group
