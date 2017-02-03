<?php if(!defined('KIRBY')) exit ?>

title: Testpage
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
  text:
    label: Text
    type: textarea
    size: large
    buttons: true
