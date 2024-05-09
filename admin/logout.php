<?php
session_start();
if (isset($_SESSION['godrichuser']) && isset($_SESSION['godrichid'])) {
	unset($_SESSION["godrichid"]);
	unset($_SESSION['godrichuser']);
	header("Location: ./");
} else {
	header("Location: ./");
}
?>