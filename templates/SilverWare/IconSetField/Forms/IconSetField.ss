<ul class="row no-gutters <% if $extraClass %> $extraClass<% end_if %>" $getAttributesHTML('class')>
  <% if $HasOptions %>
    <% loop $Options %>
      <li class="$Class">
        <input id="$ID" class="checkbox" name="$Name" type="checkbox" value="$Value.ATT"<% if $Checked %> checked="checked"<% end_if %><% if $Disabled %> disabled="disabled"<% end_if %> />
        <label for="$ID">
          <% if $Icon %><i class="fa fa-fw fa-{$Icon} option"></i><% end_if %>
          <span class="text">$Text</span>
          <i class="fa fa-fw fa-square unchecked"></i>
          <i class="fa fa-fw fa-check-square checked"></i>
        </label>
      </li>
    <% end_loop %>
  <% else %>
    <li class="col"><%t SilverWare\IconSetField\Forms\IconSetField_ss.NOOPTIONSAVAILABLE 'No options available' %></li>
  <% end_if %>
</ul>
