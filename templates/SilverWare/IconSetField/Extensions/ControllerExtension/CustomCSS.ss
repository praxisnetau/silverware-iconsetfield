<% if $getIconSetFieldColor('hover-background') || $getIconSetFieldColor('hover-foreground') %>
.field.iconset ul.iconset li > label:focus,
.field.iconset ul.iconset li > label:hover {
<% if $getIconSetFieldColor('hover-foreground') %>  color: $getIconSetFieldColor('hover-foreground');<% end_if %>
<% if $getIconSetFieldColor('hover-background') %>  background-color: $getIconSetFieldColor('hover-background');<% end_if %>
}
<% end_if %>
<% if $getIconSetFieldColor('checked-background') || $getIconSetFieldColor('checked-border') || $getIconSetFieldColor('checked-foreground') %>
.field.iconset ul.iconset li > input[type="checkbox"]:checked + label {
<% if $getIconSetFieldColor('checked-foreground') %>  color: $getIconSetFieldColor('checked-foreground');<% end_if %>
<% if $getIconSetFieldColor('checked-border') %>  border-color: $getIconSetFieldColor('checked-border');<% end_if %>
<% if $getIconSetFieldColor('checked-background') %>  background-color: $getIconSetFieldColor('checked-background');<% end_if %>
}
<% end_if %>
