<?php if(!defined('KIRBY')) exit ?>

title: Blog
pages:
  template:
    - article.recipe
    - article.text
files: true

fields:
   title: 
      label: Seitentitel
      type: text
   description:
      label: Seitenkurzbeschreibung
      type: text
