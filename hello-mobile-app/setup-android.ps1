$ErrorActionPreference = "Stop"

$SDK_DIR = "C:\Users\Solicode\AppData\Local\Android\Sdk"
$ANDROID_DIR = "$PSScriptRoot\nativephp\android"
$BINARY_URL = "https://bin.nativephp.com/main/8.4/android/android-3.1.0-php8.4.19.zip"
$ZIP_PATH = "$ANDROID_DIR\android.zip"
$EXTRACT_PATH = "$ANDROID_DIR\app\src\main"
$LOCAL_PROPS = "$ANDROID_DIR\local.properties"

Write-Host "==> Installing NativePHP for Android (PHP 8.4)" -ForegroundColor Cyan

Write-Host "[1/4] Creating Android project skeleton (--skip-php)..." -ForegroundColor Yellow
php artisan native:install android --skip-php --no-interaction

Write-Host "[2/4] Fixing local.properties (sdk.dir)..." -ForegroundColor Yellow
Set-Content -Path $LOCAL_PROPS -Value "sdk.dir=$($SDK_DIR.Replace('\', '\\').Replace(':', '\:'))"

Write-Host "[3/4] Downloading PHP 8.4 Android static libraries..." -ForegroundColor Yellow
Invoke-WebRequest -Uri $BINARY_URL -OutFile $ZIP_PATH
Expand-Archive -Path $ZIP_PATH -DestinationPath $EXTRACT_PATH -Force
Remove-Item $ZIP_PATH

Write-Host "[4/4] Verifying installation..." -ForegroundColor Yellow
$libphp = "$EXTRACT_PATH\staticLibs\arm64-v8a\libphp.a"
if (Test-Path $libphp) {
    $sizeMB = [math]::Round((Get-Item $libphp).Length / 1MB, 1)
    Write-Host "libphp.a found! ($sizeMB MB)" -ForegroundColor Green
} else {
    Write-Host "ERROR: libphp.a not found!" -ForegroundColor Red
    exit 1
}

Write-Host "==> Done! Run 'php artisan native:run android'" -ForegroundColor Green