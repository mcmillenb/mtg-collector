# 🏄‍♂️ VS Code Team Configuration Guide for Laravel + Vue

## Overview

This guide sets up a totally rad, consistent development environment for your Laravel + Vue.js team. Everyone gets the same experience, same formatting, same workflow - basically everyone's riding the same wave! 🌊

## 🚀 Quick Setup for New Team Members

1. **Clone the repo** (you've already got this gnarly setup!)
2. **Open in VS Code** - The workspace settings will automatically apply
3. **Install recommended extensions** - VS Code will prompt you when opening the project
4. **Install dependencies**:
   ```bash
   composer install
   npm install
   ```
5. **Start developing** - Use `Cmd+Shift+P` → "Tasks: Run Task" → "🌊 Full Dev Environment"

## 📁 Configuration Files Overview

### `.vscode/settings.json` - Team Workspace Settings

- **Formatters**: Laravel Pint for PHP, Prettier for JS/Vue
- **Auto-save**: Enabled on focus change
- **Performance**: Optimized for large Laravel projects
- **Language Settings**: Specific configs for PHP, Vue, Blade

### `.vscode/extensions.json` - Required Extensions

Essential extensions for Laravel + Vue development:

- **PHP**: Intelephense, Laravel Pint, Blade formatter
- **Vue**: Volar, TypeScript support, snippets
- **Quality**: Prettier, EditorConfig, TailwindCSS
- **Productivity**: GitLens, REST client, debug tools

### `.vscode/tasks.json` - Development Tasks

Quick access to common commands:

- `🚀 Laravel: Serve` - Start Laravel dev server
- `⚡ Vite: Dev Server` - Start frontend build tool
- `🧪 Laravel: Run Tests` - Execute test suite
- `🎨 Laravel: Pint Format` - Format PHP code
- `🌊 Full Dev Environment` - Start everything at once

### `.vscode/launch.json` - Debugging Configuration

- **Xdebug**: PHP debugging with Laravel
- **Chrome**: Frontend debugging for Vue
- **PHPUnit**: Test debugging

## 🎯 Language-Specific Settings

### PHP/Laravel

- **Formatter**: Laravel Pint (configured in `pint.json`)
- **IntelliSense**: Intelephense with Laravel stubs
- **Tab Size**: 4 spaces (follows PSR standards)
- **Auto-formatting**: On save

### Vue.js/JavaScript

- **Formatter**: Prettier
- **IntelliSense**: Volar for Vue, TypeScript support
- **Tab Size**: 2 spaces (frontend convention)
- **Linting**: ESLint integration ready

### Blade Templates

- **Formatter**: Blade Formatter
- **Emmet**: HTML support in Blade files
- **Tab Size**: 4 spaces (matches PHP)

## 🔧 Code Quality & Consistency

### Formatting

- **On Save**: Automatic formatting for all file types
- **EditorConfig**: Consistent indentation across editors
- **Laravel Pint**: PHP formatting following Laravel standards
- **Prettier**: JavaScript/Vue formatting

### File Exclusions

Performance optimizations by excluding:

- `node_modules/`
- `vendor/`
- `storage/` (except app)
- `public/build/`
- `bootstrap/cache/`

## 🎮 Development Workflow

### Starting Development

1. **Terminal**: `Ctrl+Shift+\`` to open terminal
2. **Tasks**: `Ctrl+Shift+P` → "Tasks: Run Task"
3. **Run**: Select "🌊 Full Dev Environment"
4. **Code**: Everything's ready to go!

### Common Tasks

- **Format Code**: `Ctrl+F` (custom keybinding)
- **Run Tests**: Task → "🧪 Laravel: Run Tests"
- **Debug PHP**: F5 with "🐛 Listen for Xdebug"
- **Debug Vue**: F5 with "🌐 Launch Chrome for Vue"

### Code Snippets

Type these prefixes and hit Tab:

- `lcontroller` - Laravel controller template
- `lmodel` - Laravel model with fillables
- `ltest` - PHPUnit test template
- `vcomp` - Vue 3 Composition API component
- `ipage` - Inertia page component

## 🛠️ Troubleshooting

### Extensions Not Working?

1. Check VS Code has recommended extensions installed
2. Reload window: `Ctrl+Shift+P` → "Developer: Reload Window"
3. Check extension logs in Output panel

### Formatting Issues?

1. Verify Laravel Pint is installed: `./vendor/bin/pint --version`
2. Check Prettier config in `.prettierrc`
3. Ensure correct formatter is set in language settings

### IntelliSense Problems?

1. **PHP**: Check Intelephense extension is active
2. **Vue**: Ensure Volar is enabled and Vetur is disabled
3. **Paths**: Verify include paths in workspace settings

### Performance Issues?

1. Check file exclusions are working
2. Increase PHP memory limit in settings
3. Restart TypeScript service: `Ctrl+Shift+P` → "TypeScript: Restart TS Server"

## 🔒 Team Consistency Rules

### What's Enforced (Workspace Level)

✅ Code formatting settings
✅ Tab sizes and indentation
✅ File associations (.blade.php)
✅ Extension recommendations
✅ Performance optimizations

### What's Flexible (User Level)

🎨 Color themes
🎨 Font family/size
🎨 Minimap preferences
🎨 Terminal preferences
🎨 Personal keybindings

## 📦 Adding New Extensions

When adding new extensions to the team setup:

1. **Test thoroughly** with the current stack
2. **Add to extensions.json** recommendations
3. **Document** any required settings
4. **Update this guide** with new workflows

## 🎯 Performance Tips

### For Large Projects

- Use search exclusions to avoid indexing build files
- Set appropriate memory limits for PHP/TypeScript
- Disable unnecessary language features in settings

### For Remote Development

- Enable auto-save for better sync
- Use lightweight themes
- Optimize terminal performance

---

## 🌊 That's a Wrap!

This configuration is designed to keep your team flowing like pros. Everyone gets the same rad experience, same formatting, same debugging setup. It's like having perfectly groomed powder on every run!

Questions? Check the troubleshooting section or hit up the team chat. Happy coding! 🤙

---

_Generated with ❤️ for the most excellent development team_
