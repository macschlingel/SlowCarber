<?php if(!defined('KIRBY')) exit ?>

title: Rezept
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
    label: Veröffentlichungsdatum
    type: date
  publishtime:
    label: Veröffentlichungszeit
    type: text
  category:
    label: Kategorie
    type: radio
    options:
      Gedanke: Gedanke
      Rezept: Rezept
      Tool: Tool
      Gadget: Gadget
      Lebensmittel: Lebensmittel
      Technisches: Technisches
      Sonstiges: Sonstiges
    default: Gedanke
  tags:
    label: Tags
    type: text
  preptime:
    label: Vorbereitungszeit (in Minuten)
    type: text
  cooktime:
    label: Kochzeit (in Minuten)
    type: text
  recipeyield:
    label: Für wieviele Portionen reicht es?
    type: text
    default: 1 Portion
  ingredients:
    label: Zutaten
    type: textarea
    size: large
    buttons: true 
  prep:
    label: Zubereitung
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
      Thomas: Thomas
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
      sandraweller: sandraweller
    default: schlingel
  comments:
    label: Kommentarsystem
    type: radio
    options:
      vanilla: Vanilla-Comments
      disqus: Disqus-Comments
      none: Keins
    default: vanilla
