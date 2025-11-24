# GitHub MCP Setup Guide

## Configuration Complete ✅

Your `mcp.json` file has been configured with GitHub MCP server support.

## Next Steps

### 1. Get a GitHub Personal Access Token (PAT)

1. Go to GitHub: https://github.com/settings/tokens
2. Click "Generate new token" → "Generate new token (classic)"
3. Give it a name (e.g., "Cursor MCP")
4. Select the following scopes:
   - `repo` - Full control of private repositories
   - `read:org` - Read org and team membership (if needed)
   - `read:user` - Read user profile data
5. Click "Generate token"
6. **Copy the token immediately** (you won't see it again!)

### 2. Add Token to mcp.json

Edit `/home/asqr/.cursor/mcp.json` and add your token:

```json
{
  "mcpServers": {
    "github": {
      "command": "npx",
      "args": [
        "-y",
        "@modelcontextprotocol/server-github"
      ],
      "env": {
        "GITHUB_PERSONAL_ACCESS_TOKEN": "your_token_here"
      }
    }
  }
}
```

### 3. Restart Cursor

After adding your token, restart Cursor for the changes to take effect.

## Alternative: Environment Variable (More Secure)

Instead of storing the token in the config file, you can use an environment variable:

1. Add to your `~/.bashrc` or `~/.zshrc`:
   ```bash
   export GITHUB_PERSONAL_ACCESS_TOKEN="your_token_here"
   ```

2. Update `mcp.json` to remove the token (it will use the env variable):
   ```json
   {
     "mcpServers": {
       "github": {
         "command": "npx",
         "args": [
           "-y",
           "@modelcontextprotocol/server-github"
         ]
       }
     }
   }
   ```

## What This Enables

With GitHub MCP configured, you can:
- Access GitHub repositories through Cursor
- Search repositories and code
- Read file contents
- Get repository information
- Access issue and PR data (depending on token permissions)

## Troubleshooting

If the MCP server doesn't work:
1. Make sure Node.js is installed: `node --version`
2. Check that npx is available: `npx --version`
3. Verify your token has the correct permissions
4. Restart Cursor after making changes
5. Check Cursor's MCP logs for errors

## Security Note

⚠️ **Never commit your GitHub token to version control!**
- Keep `mcp.json` with tokens in `.gitignore`
- Use environment variables for production
- Rotate tokens regularly


