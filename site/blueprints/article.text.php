<?php if(!defined('KIRBY')) exit ?>

title: Artikel
pages: false
files: true

fields:
  title: 
    label: Seitentitel
    type: text
  description:
    label: Seitenkurzbeschreibung
    type: text
  date:
    label: Datum
    type: date
  publishtime:
    label: Veröffentlichungszeit
    type: text
  category:
    label: Kategorie
    type: text
  tags:
    label: Tags
    type: text
  text:
    label: Text
    type: textarea
    size: large
    buttons: true 
  author:
    label: Autor
    type: radio
    options:
      Bastian: Bastian
      Jam: Jam
      Lukas: Lukas
      Tobias: Tobias
      Arne: Arne
      Felix: Felix
      Florian: Florian
    default: Bastian
  flattr:
    label: Flattr-ID
    type: radio
    options:
      schlingel: schlingel
      Jam2000: Jam2000
      TheAssmann: TheAssmann
      iStehle: iStehle
      codenaga: codenaga
      svPodcast: svPodcast
    default: schlingel
  comments:
    label: Kommentarsystem
    type: radio
    options:
      vanilla: Vanilla-Comments
      disqus: Disqus-Comments
      none: Keins
    default: vanilla
