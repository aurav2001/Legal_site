Add-Type -AssemblyName System.IO.Compression
Add-Type -AssemblyName System.IO.Compression.FileSystem

$cwd = (Get-Location).Path
$src = Join-Path $cwd "wp-theme-legal-insights"

function Create-Zip($zipName, $folderPrefix) {
    $zipPath = Join-Path $cwd $zipName
    if (Test-Path $zipPath) { Remove-Item $zipPath -Force }
    
    $stream = [System.IO.File]::Open($zipPath, [System.IO.FileMode]::Create)
    $archive = New-Object System.IO.Compression.ZipArchive($stream, [System.IO.Compression.ZipArchiveMode]::Create)
    
    $files = Get-ChildItem -Path $src -Recurse | Where-Object { -not $_.PSIsContainer }
    foreach ($f in $files) {
        $rel = $f.FullName.Substring($src.Length + 1).Replace('\', '/')
        $entryName = $folderPrefix + '/' + $rel
        [void][System.IO.Compression.ZipFileExtensions]::CreateEntryFromFile($archive, $f.FullName, $entryName)
    }
    
    $archive.Dispose()
    $stream.Dispose()
    Write-Host "$zipName created: $((Get-Item $zipPath).Length) bytes"
}

Create-Zip "lexvanguard.zip" "lexvanguard"
Create-Zip "wp-theme-legal-insights.zip" "wp-theme-legal-insights"


