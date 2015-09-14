<script>

// fallback - to deal with IE (or browsers that don't have console)
if (! window.console) console = {};
console.log = console.log || function(name, data){};
// end of fallback

console.log('<?php echo $name;?>');
console.log('------------------------------------------');
console.log('$<?php echo $type;?>');
console.log(<?php echo $data;?>);
// console.log('\\n');

</script>